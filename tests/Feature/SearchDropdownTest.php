<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchJobDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    /** @test */
    function home_page_contains_search_form_livewire_component()
    {
        $this->get('/')
            ->assertSeeLivewire('search-job-dropdown');
    }
    /** @test */
    function search_dropdown_searches_correctly_if_no_song_exists()
    {
        Livewire::test(SearchJobDropdown::class)
            ->set('search', 'jgelrjgergklerjhuhbjkgjhuibhjk')
            ->assertSee('No results found for');
    }
    /** @test */
    function search_dropdown_searches_correctly_if_song_exists()
    {
        Livewire::test(SearchJobDropdown::class)
            ->set('search', 'Imagine')
            ->assertSee('John Lennon');
    }
}
