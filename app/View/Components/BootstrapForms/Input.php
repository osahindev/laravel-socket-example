<?php

namespace App\View\Components\BootstrapForms;

use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $name;
    public $labelText;
    public $value;
    public $placeholderText;
    public $inputType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $id, string $name, string $labelText, ?string $value = null, ?string $placeholderText = null, string $inputType = "text")
    {
        $this->id = $id;
        $this->name = $name;
        $this->labelText = $labelText;
        $this->value = $value;
        $this->placeholderText = $placeholderText;
        $this->inputType = $inputType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bootstrap-forms.input');
    }
}
