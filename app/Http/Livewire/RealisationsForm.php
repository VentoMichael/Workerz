<?php

namespace App\Http\Livewire;

use App\Models\Realisation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class RealisationsForm extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $pictures = [];
    protected $backgroundSizes = ['1980', '1280', '680'];

    public function render()
    {
        $realisations = auth()->user()->realisations;

        return view('livewire.realisations-form',compact('realisations'));
    }

    public function submitForm()
    {
        $this->validate([
            'title' => 'required|string',
            'description' => 'required|string|max:256',
            'pictures.*' => 'image|mimes:png,jpg,jpeg|max:1024',
        ]);
        Realisation::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'pictures' => $this->createImages($this->pictures, strtolower(auth()->user()->company->name), $this->title),
        ]);
        $this->title = '';
        $this->description = '';
        $this->pictures = [];

    }

    protected function createImages($uploadedImages, $folder, $filename)
    {
        $imagePaths = [];

        foreach ($uploadedImages as $index => $uploadedImage) {
            $filenameSlug = Str::slug($filename, '-');
            $imageSet = [];

            foreach ($this->backgroundSizes as $width) {
                $image = Image::make($uploadedImage)
                    ->resize($width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('jpg', 80);

                $imagePath = 'realisations/' . Str::slug($folder, '/') . '/' . $filenameSlug . '/' . ($index + 1) . '/' . $width . '.jpg';
                Storage::disk('public')->put($imagePath, (string) $image);

                $webpImage = $image->encode('webp', 80);
                $webpPath = 'realisations/' . Str::slug($folder, '/') . '/' . $filenameSlug . '/' . ($index + 1) . '/' . $width . '.webp';
                Storage::disk('public')->put($webpPath, (string) $webpImage);

                $imageSet[] = [
                    'path' => $imagePath,
                    'webp' => $webpPath,
                ];
            }

            $imagePaths[] = $imageSet;
        }

        return $imagePaths;
    }



    public function removePicture($index)
    {
        unset($this->pictures[$index]);
        $this->pictures = array_values($this->pictures);
    }
}
