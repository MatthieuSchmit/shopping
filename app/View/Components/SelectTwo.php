<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectTwo extends Component {

    public $name;
    public $label;
    public $route;
    public $oldID;
    public $oldText;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $route, $oldID = 0, $oldText = '') {
        $this->name = $name;
        $this->label = $label;
        $this->route = $route;
        $this->oldID = $oldID;
        $this->oldText = $oldText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select-two');
    }
}
