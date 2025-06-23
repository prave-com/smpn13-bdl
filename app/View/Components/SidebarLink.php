<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarLink extends Component
{
    /**
     * The link's href URL.
     *
     * @var string
     */
    public $href;

    /**
     * Whether the link is active.
     *
     * @var bool
     */
    public $active; // <--- Deklarasikan variabel $active di sini

    /**
     * Create a new component instance.
     */
    public function __construct(string $href, bool $active = false) // <--- Tambahkan $active di konstruktor
    {
        $this->href = $href;
        $this->active = $active; // Inisialisasi properti
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-link');
    }
}