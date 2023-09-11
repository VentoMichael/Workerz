<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilUpdates extends Component
{
    use WithFileUploads;

    public $username;
    public $about;
    public $showBackgroundImage = true;
    public $showAvatarImage = true;
    public $avatarUpload;
    public $backgroundUpload;
    public $firstname;
    public $lastname;
    public $email;
    public $streetAddress;
    public $city;
    public $region;
    public $postalCode;
    public $hasChanges = false;
    public $successMessage = '';
    public $infoMessage = '';
    public $anchor = '';
    public $containsDefaultBackground = false;
    public $containsDefaultAvatar = false;
    public $defaultBackgrounds = ["covers/default_background_320.jpg", "covers/default_background_320.webp", "covers/default_background_680.jpg", "covers/default_background_680.webp", "covers/default_background_1280.jpg", "covers/default_background_1280.webp", "covers/default_background_1980.jpg", "covers/default_background_1980.webp"];
    public $defaultAvatar;

    protected $avatarSizes = ['32x32', '160x160', '128x128'];
    protected $backgroundSizes = ['1980x192', '1280x192', '680x192'];

    protected $rules = [
        'about' => 'required|min:10',
        'firstname' => 'required',
        'lastname' => 'required',
        'streetAddress' => 'required',
        'city' => 'required',
        'region' => 'required',
        'postalCode' => 'required|integer',
    ];

    public function mount()
    {
        $user = Auth::user();
        foreach ($user->backgroundUpload as $value) {
            if (strpos($value, 'covers/default_background') !== false) {
                $this->containsDefaultBackground = true;
                break; // Exit the loop if we find the default_background
            }
        }
        $this->about = $user->about ?? '';
        $this->username = $user->username ?? '';
        $this->email = $user->email ?? '';
        $this->firstname = $user->firstname ?? '';
        $this->lastname = $user->lastname ?? '';
        $this->streetAddress = $user->streetAddress ?? '';
        $this->city = $user->city ?? '';
        $this->region = $user->region ?? '';
        $this->postalCode = $user->postalCode ?? '';
        $this->defaultAvatar = 'avatars/' . $this->username . '/initials/initial';
    }

    public function updated($propertyName)
    {
        $this->hasChanges = true;
        $this->validateOnly($propertyName);

        if ($this->$propertyName === Auth::user()->$propertyName) {
            $this->hasChanges = false;
        }
    }

    public function removeBackgroundImage()
    {
        $this->showBackgroundImage = false;
        $this->backgroundUpload = false;
        $this->hasChanges = true;

    }

    public function removeAvatarImage()
    {
        $this->showAvatarImage = false;
        $this->avatarUpload = false;
        $this->hasChanges = true;
    }

    public function submitForm()
    {
        if (!$this->showBackgroundImage) {
            $userData['backgroundUpload'] = $this->defaultBackgrounds;
        }

        if (!$this->showAvatarImage) {
            $userData['avatarUpload'] = $this->defaultAvatar;
        }

        if ($this->hasChanges) {

            $userData = [
                'about' => $this->about,
                'firstname' => ucfirst($this->firstname),
                'lastname' => ucfirst($this->lastname),
                'streetAddress' => $this->streetAddress,
                'city' => $this->city,
                'region' => $this->region,
                'postalCode' => $this->postalCode,
            ];
            if ($this->avatarUpload || $this->backgroundUpload) {
                $this->validate(['backgroundUpload' => 'nullable|image|max:1024'], ['avatarUpload' => 'nullable|image|max:1024']);
            }
            if ($this->avatarUpload) {
                Storage::deleteDirectory('avatars/' . $this->username);
                $userData['avatarUpload'] = $this->processAndStoreImage($this->avatarUpload, 'avatars', $this->username, true);
            } else {
                $userData['avatarUpload'] = $this->defaultAvatar;
            }

            if ($this->backgroundUpload) {
                Storage::deleteDirectory('covers/' . $this->username);
                $userData['backgroundUpload'] = $this->processAndStoreImage($this->backgroundUpload, 'covers', $this->username, false);
            } else {
                $userData['backgroundUpload'] = $this->defaultBackgrounds;
            }


            $this->successMessage = 'Profile updated successfully!';
            $this->infoMessage = null;
            $this->clearProperty = 'successMessage';
            Auth::user()->update($userData);
            $this->anchor = 'successMsg';
        } else {
            $this->successMessage = null;
            $this->clearProperty = 'infoMessage';
            $this->infoMessage = 'No changes made to update.';
            $this->anchor = 'infoMsg';
        }

        // Use Livewire's built-in function to emit a client-side event
        $this->dispatch('delayed-action', ['delay' => 1000]); // Delay for 1 second
    }


    public function clearMessage($property)
    {
        $this->$property = null;
    }

    public function generateInitialsImage($folder, $username)
    {
        $name = $this->username;
        $initials = strtoupper($name[0]);

        $svgImage = '<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" xmlns:xlink="http://www.w3.org/1999/xlink">
        <rect width="100%" height="100%" fill="#5850EC" />
        <text x="50" y="54" font-family="Ubuntu, sans-serif" font-size="48" fill="#FFFFFF" text-anchor="middle" alignment-baseline="middle">' . $initials . '</text>
    </svg>';

        $filename = uniqid('', true);
        Storage::disk('public')->put($folder . '/' . $username . '/initials/' . $filename . '.svg', $svgImage);

        return $folder . '/' . $username . '/initials/' . $filename;
    }

    protected function processAndStoreImage($uploadedImage, $folder, $filename, $isAvatar)
    {
            $initialsPath = $this->generateInitialsImage($folder, $filename);
        if (!$uploadedImage) {
            return $initialsPath;
        }

        $imagePath = $this->createImages($uploadedImage, $folder, $filename, $isAvatar);

        return $imagePath;
    }

    protected function createImages($uploadedImage, $folder, $filename, $isAvatar)
    {
        $imagePath = [];
        foreach (($isAvatar ? $this->avatarSizes : $this->backgroundSizes) as $size) {
            list($width, $height) = explode('x', $size);

            $image = Image::make($uploadedImage)
                ->fit($width, $height)
                ->encode('jpg', 80);

            $imagePath[] = $folder . '/' . $filename . '/' . $size . '.jpg';
            Storage::disk('public')->put($folder . '/' . $filename . '/' . $size . '.jpg', $image);

            $webpImage = clone $image;
            $webpImage->encode('webp', 80);
            $imagePath[] = $folder . '/' . $filename . '/' . $size . '.webp';
            Storage::disk('public')->put($folder . '/' . $filename . '/' . $size . '.webp', $webpImage);
        }

        return $imagePath;
    }

    public function render()
    {
        return view('livewire.profil-updates');
    }
}
