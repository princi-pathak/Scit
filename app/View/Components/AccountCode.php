<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AccountCode extends Component
{
    /**
     * Create a new component instance.
     */
    public $modalId;
    public $modalTitle;
    public $formId;
    public $inputId;
    public $statusId;
    public $saveButtonId;
    public function __construct(         string $modalId = 'defaultModalId',
    string $modalTitle = 'Job Title - Add',
    string $formId = 'defaultFormId',
    string $inputId = 'defaultInputId',
    string $statusId = 'defaultStatusId',
    string $saveButtonId = 'defaultSaveButtonId')
    {
        $this->modalId = $modalId;
        $this->modalTitle = $modalTitle;
        $this->formId = $formId;
        $this->inputId = $inputId;
        $this->statusId = $statusId;
        $this->saveButtonId = $saveButtonId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.account-code');
    }
}
