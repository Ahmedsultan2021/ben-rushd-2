<?php

namespace App\Exports;

use App\Form;
use App\Models\Form as ModelsForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormExport implements FromCollection, WithHeadings
{
    protected $form;

    public function __construct(ModelsForm $form)
    {
        $this->form = $form;
    }

    public function collection()
    {
        $data = [];
        
        foreach ($this->form->formResponses as $response) {
            $rowData = [$response->id];
            foreach ($response->fieldResponses as $fieldResponse) {
                $rowData[] = $fieldResponse->value;
            }
            $rowData[] = $response->created_at;
            $data[] = $rowData;
        }

        return collect($data);
    }

    public function headings(): array
    {
        $headings = ['Response ID'];
        foreach ($this->form->fields as $field) {
            $headings[] = $field->label;
        }
        $headings[] = 'Created At';

        return $headings;
    }
}
