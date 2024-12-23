<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Auth;
use App\Models\AttachmentType;

class addAttachmentModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $purchaseModalId;
    public $modalTitle;
    public $purchaseformId;
    public $refTitle;
    public $TypeId;
    public $inputTitle;
    public $inputDescription;
    public $selectfile_name;
    public $hiddenForeignId;
    public $saveButtonId;
    public function __construct(
        string $purchaseModalId = 'defaultModalId',
        string $purchaseformId = 'defaultFormId',
        string $refTitle = 'defaultRefTitle',
        string $modalTitle = 'Add Attachment',
        string $TypeId = 'defaultTypeId',
        string $inputTitle = 'defaultInputTitle',
        string $selectfile_name = 'defaultSelectfile_name',
        string $inputDescription = 'defaultInputDescription',
        string $hiddenForeignId = 'defaulthiddenForeignId',
        string $saveButtonId = 'defaultSaveButtonId',)
    {
        $this->purchaseModalId = $purchaseModalId;
        $this->purchaseformId = $purchaseformId;
        $this->refTitle = $refTitle;
        $this->modalTitle = $modalTitle;
        $this->TypeId = $TypeId;
        $this->inputTitle = $inputTitle;
        $this->inputDescription = $inputDescription;
        $this->selectfile_name = $selectfile_name;
        $this->hiddenForeignId = $hiddenForeignId;
        $this->saveButtonId = $saveButtonId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['attachment_type'] = AttachmentType::getActiveAttachmentType(Auth::user()->home_id);
        return view('components.add-attachment-modal',$data);
    }
}
