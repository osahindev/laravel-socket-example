<?php

namespace App\View\Components\BootstrapForms;

use Illuminate\View\Component;

class Select extends Component
{
    public string $id;
    public string $name;
    public string $labelText;
    public ?array $options;
    public ?string $value;
    public ?string $placeholderText;

    /**
     * Create a new component instance.
     *
     * @param string $id - select id and label for attributes value.
     * @param string $name - select name attribute value.
     * @param string $labelText - label text value.
     * @param array $options - İn select options values.
     * @param ?string $value - Selected value in select options.
     * @param ?string $placeholderText - First option text.
     * @return void
     */
    public function __construct(string $id, string $name, string $labelText, array $options = [], ?string $value = null, ?string $placeholderText = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->labelText = $labelText;
        $this->options = $options;
        $this->value = $value;
        $this->placeholderText = $placeholderText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bootstrap-forms.select');
    }
}
