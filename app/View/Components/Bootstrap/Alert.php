<?php

namespace App\View\Components\Bootstrap;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $title;
    public string $message;
    public string $type;

    /**
     * Create a new component instance.
     *
     * @param string $title - Bootstrap alert component title.
     * @param string $message - Bootstrap alert message
     * @param string $type - Bootstrap alert type.
     * @return void
     */
    public function __construct(string $title,string $message, string $type)
    {
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bootstrap.alert');
    }
}
