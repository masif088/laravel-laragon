<?php

namespace App\Http\Livewire\User;

use App\Http\Livewire\Form\Transaction;
use App\Repository\Form\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaymentConfirmation extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $data;
    public $dataId;
    public $action;
    public $model;

    public function mount()
    {
        $this->model = \App\Repository\Form\PaymentConfirmation::class;
        $this->data = form_model($this->model, $this->dataId);
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $user = User::find(auth()->user()->id)->first();
        $this->data['user_id'] = auth()->user()->id;
        $this->data['transaction_status_id'] = 1;
        $this->data['no_invoice'] = $this->model::getCode();
        if ($this->data['thumbnail_state'] != null) {
            $image = Image::make($this->data['thumbnail_state'])
                ->resize(1920, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->stream();
            $filename = Str::slug($this->data['no_invoice']). '.' . $this->data['thumbnail_state']->getClientOriginalExtension();
            Storage::disk('local')->put('public/payment_confirmation/' . $filename, $image, 'public');
            $this->data['thumbnail'] = 'payment_confirmation/' . $filename;
        }
        $this->model::create($this->data);

//        $user->update([
//            'payment_deadline' => $startDate->addMonth()
//        ]);
        $this->alert('success', 'Berhasil melakukan konfirmasi silahkan tunggu');
        $this->emit('redirect', route('member.payment'));
    }

    public function render()
    {
        return view('livewire.user.payment-confirmation');
    }

    protected function getRules()
    {
        return $this->model::formRules();
    }
}
