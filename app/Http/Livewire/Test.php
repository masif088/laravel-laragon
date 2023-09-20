<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $chart;
    public $chart1;
    public $chart2;
    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function mount(){
        $this->chart=[
            'type'=>'doughnut',
            'height'=>'300',
            'categories'=>['Some','Chek','caa','sssd','eaads'],
            'data'=> [
                [ 'label'=>'Asif' ,'value'=>[11,22,35,14,15]],
                [ 'label'=>'Amalia' ,'value'=>[15,0,32,21,11]],
                [ 'label'=>'A' ,'value'=>[5,4,2,1,11]],
            ]
        ];

        $this->chart2=[
            'type'=>'doughnut',
            'height'=>'300',
            'categories'=>['Some','Chek','caa','sssd','eaads'],
            'data'=> [
                [ 'label'=>'Asif' ,'value'=>[11,22,35,14,15]],
                [ 'label'=>'Amalia' ,'value'=>[15,0,32,21,11]],
                [ 'label'=>'A' ,'value'=>[5,4,2,1,11]],
            ]
        ];

        $this->chart1=[
            'type'=>'doughnut',
            'height'=>'300',
            'categories'=>['Some','Chek','caa','sssd','eaads'],
            'data'=> [
                [ 'label'=>'Asif' ,'value'=>[11,22,35,14,15]],
                [ 'label'=>'Amalia' ,'value'=>[15,0,32,21,11]],
                [ 'label'=>'A' ,'value'=>[5,4,2,1,11]],
            ]

        ];
    }
    public function render()
    {
        return view('livewire.test');
    }
}
