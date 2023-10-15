<?php

namespace App\Http\Livewire;

use App\Models\Region;
use App\Models\User;
use Exception;
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

    public $name;
    public $about;
    public $showBackgroundImage = true;
    public $showAvatarImage = true;
    public $logoUpload;
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
    public $errorMessage = '';
    public $infoMessage = '';
    public $anchor = '';
    public $containsDefaultBackground = false;
    public $containsDefaultAvatar = false;
    public $defaultBackgrounds = ["default_cover/default_background_320.jpg", "default_cover/default_background_320.webp", "default_cover/default_background_680.jpg", "default_cover/default_background_680.webp", "default_cover/default_background_1280.jpg", "default_cover/default_background_1280.webp", "default_cover/default_background_1980.jpg", "default_cover/default_background_1980.webp"];
    public $defaultLogo;
    public $tempUrlCover;
    public $tempUrlLogo;

    protected $logoSizes = ['32x32', '160x160', '128x128'];
    protected $backgroundSizes = ['1980x192', '1280x192', '680x192'];

    public $typeRegion;
    public $showRegionsList = false;
    public $filteredRegions = [];
    public $selectedRegions = [];
    public $regions = [];
    public $maxRegions = 2;

    protected $rules = [
        'about' => 'required|min:10',
        'firstname' => 'required',
        'lastname' => 'required',
        'streetAddress' => 'required',
        'city' => 'required',
        'region' => 'required',
        'logoUpload' => 'nullable|image|mimes:jpeg,png,svg,webp|max:1024',
        'backgroundUpload' => 'nullable|image|mimes:jpeg,png,svg,webp|max:3072',
        'postalCode' => 'required|integer',
    ];
    public function updatedBackgroundUpload(){
        try{
            $this->tempUrlCover = $this->backgroundUpload->temporaryUrl();
        }catch(Exception $e){
            $this->tempUrlCover = '';
            $this->hasChanges = false;
        }
    }
    public function updatedLogoUpload(){
        try{
            $this->tempUrlLogo = $this->logoUpload->temporaryUrl();
        }catch(Exception $e){
            $this->tempUrlLogo = '';
            $this->hasChanges = false;
        }
    }
    public function mount()
    {
        $user = Auth::user();
        foreach ($user->company->backgroundUpload as $value) {
            if (strpos($value, 'default_cover/default_background_') !== false) {
                $this->containsDefaultBackground = true;
                break;
            }
        }
        $this->about = $user->company->about ?? '';
        $this->name = $user->company->name ?? '';
        $this->email = $user->email ?? '';
        $this->firstname = $user->firstname ?? '';
        $this->lastname = $user->lastname ?? '';
        $this->streetAddress = $user->streetAddress ?? '';
        $this->city = $user->city ?? '';
        $this->selectedRegion = $user->company->regions ?? '';
        $this->postalCode = $user->postalCode ?? '';
        $this->selectedRegions = $user->company->regions->pluck('id', 'name')->toArray() ?? '';
        $this->defaultLogo = 'freelancer/logos/' . $this->name . '/initials/initial';
        $this->regions = Region::all()->toArray();
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
        $company = Auth::user()->company;
        $company->update(['backgroundUpload' => $this->defaultBackgrounds]);
        $company->save();
        $this->hasChanges = true;
    }

    public function removeAvatarImage()
    {

        $this->showAvatarImage = false;
        $company = Auth::user()->company;
        $this->tempUrlLogo = asset($this->defaultLogo . '.svg');
        $company['logoUpload'] = $this->defaultLogo;

        $company->save();
        $this->hasChanges = true;
    }

    public function toggleRegionsList()
    {
        $this->showRegionsList = !$this->showRegionsList;

        if ($this->showRegionsList) {
            $this->filteredRegions = $this->regions;
        } else {

            $this->typeRegion = '';
            $this->filteredRegions = $this->regions;
        }
    }

    public function removeRegion($regionId)
    {
        if (($key = array_search($regionId, $this->selectedRegions)) !== false) {
            unset($this->selectedRegions[$key]);
        }
        $this->selectedRegions = array_values($this->selectedRegions);
        $this->hasChanges = true;

    }

    public function addRegion($region)
    {

        $region = trim($region);

        $selectedRegionsLower = array_map('strtolower', $this->selectedRegions);

        if (
            !empty($region) &&
            !in_array(strtolower($region), $selectedRegionsLower) &&
            count($this->selectedRegions) < $this->maxRegions
        ) {
            $this->selectedRegions[] = $region;
            $this->showRegionsList = false;
            $this->highlightedRegion = null;
            $this->reset('typeRegion');
            $this->hasChanges = true;
        }
    }

    public function filterRegions()
    {

        $this->filteredRegions = array_values(array_filter($this->regions, function ($region) {
            return !in_array(strtolower($region['name']), array_map('strtolower', $this->selectedRegions))
                && stripos($region['name'], strtolower($this->typeRegion)) !== false;
        }));
        $this->showRegionsList = true;
    }


    public function getSelectedRegionNames()
    {
        return collect($this->regions)->filter(function ($region) {
            return in_array($region['id'], $this->selectedRegions);
        })->pluck('name');
    }

    public function getSelectedRegionNameId()
    {
        $selectedRegions = collect($this->regions)->filter(function ($region) {
            return in_array($region['id'], $this->selectedRegions);
        });

        return $selectedRegions->pluck('name', 'id');
    }

    public function saveRegionsForCompany($company)
    {
        $selectedRegionNames = $this->getSelectedRegionNames();

        $selectedRegionIds = Region::whereIn('name', $selectedRegionNames)->pluck('id')->toArray();

        $company->regions()->sync($selectedRegionIds);
    }

    public function submitForm()
    {

        try {
            $selectedRegionNames = array_keys($this->selectedRegions);
            $companyRegionNames = Auth::user()->company->regions->pluck('name')->toArray();

            if (count(array_diff($selectedRegionNames, $companyRegionNames)) > 0) {
                $company = Auth::user()->company;
                $this->saveRegionsForCompany($company);
                //TODO:saving but error temporary url
            }

            if (!$this->showBackgroundImage) {
                $companyData['backgroundUpload'] = $this->defaultBackgrounds;
            }

            if (!$this->showAvatarImage) {
                $companyData['logoUpload'] = $this->defaultLogo;
            }

            if ($this->hasChanges) {

                $companyData = [
                    'about' => $this->about,
                ];
                $userData = [
                    'firstname' => ucfirst($this->firstname),
                    'lastname' => ucfirst($this->lastname),
                    'streetAddress' => $this->streetAddress,
                    'city' => $this->city,
                    'postalCode' => $this->postalCode,
                ];
                if ($this->logoUpload || $this->backgroundUpload) {
                    $this->validate(['backgroundUpload' => 'nullable|image|max:1024'], ['logoUpload' => 'nullable|image|max:1024']);
                }
                if ($this->logoUpload) {
                    $companyData['logoUpload'] = $this->processAndStoreImage($this->logoUpload, 'logos', $this->name, true);
                }
                if ($this->backgroundUpload) {
                    $companyData['backgroundUpload'] = $this->processAndStoreImage($this->backgroundUpload, 'covers', $this->name, false);
                }

                $this->successMessage = 'Profile updated successfully!';
                $this->infoMessage = null;
                $this->clearProperty = 'successMessage';
                $company = Auth::user()->company;
                Auth::user()->update($userData);
                $company->update($companyData);
                $this->saveRegionsForCompany($company);
                $this->anchor = 'successMsg';
            } else {
                $this->successMessage = null;
                $this->clearProperty = 'infoMessage';
                $this->infoMessage = 'No changes made to update.';
                $this->anchor = 'infoMsg';
            }
            $this->hasChanges = false;
            $this->dispatch('delayed-action', ['delay' => 1000]);
        } catch (Exception $e) {
            $this->successMessage = null;
            $this->clearProperty = 'errorMessage';
            $this->errorMessage = 'There is an error, please try again later.';
            //$this->errorMessage = 'There is an error, please try again later.';
        }
    }


    public function clearMessage($property)
    {
        $this->$property = null;
    }

    protected function processAndStoreImage($uploadedImage, $folder, $filename, $isAvatar)
    {
        $initialsPath = 'freelancer/' . $folder . '/' . $filename . '/initials/' . $filename;
        if (!$uploadedImage) {
            return $initialsPath;
        }

        $imagePath = $this->createImages($uploadedImage, $folder, $filename, $isAvatar);

        return $imagePath;
    }

    protected function createImages($uploadedImage, $folder, $filename, $isAvatar)
    {
        $imagePath = [];
        foreach (($isAvatar ? $this->logoSizes : $this->backgroundSizes) as $size) {
            list($width, $height) = explode('x', $size);

            $image = Image::make($uploadedImage)
                ->fit($width, $height)
                ->encode('jpg', 80);

            $imagePath[] = 'freelancer/' . $folder . '/' . $filename . '/' . $size . '.jpg';
            Storage::disk('public')->put('freelancer/' . $folder . '/' . $filename . '/' . $size . '.jpg', $image);

            $webpImage = clone $image;
            $webpImage->encode('webp', 80);
            $imagePath[] = 'freelancer/' . $folder . '/' . $filename . '/' . $size . '.webp';
            Storage::disk('public')->put('freelancer/' . $folder . '/' . $filename . '/' . $size . '.webp', $webpImage);
        }

        return $imagePath;
    }

    public function render()
    {
        return view('livewire.profil-updates');
    }
}
