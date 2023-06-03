<?php

namespace App\Exports;

use App\Models\GymMember;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Auth;

class GymMemberExport implements FromCollection, WithHeadings, WithMapping
{
    private $keyword;
	
	public function __construct($partner_id = 0)
    {
        $this->partner_id = $partner_id;
    }
	/**
     * @return Collection
     */
    public function collection(): Collection
    {
		return GymMember::where('partner_id',$this->partner_id)->get();
    }

    /**
     * @return array[]
     */
    public function headings(): array
    {
        return array("Name","Email","Mobile","Age","Blood Group","Joining Date","Status","Created At");
    }
	/**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            @$row["name"],
            @$row["email"],
            @$row["mobile"],
			$row["age"],
			$row["blood_group"],
			!empty($row["joining_date"]) ? date('d-m-Y',strtotime($row["joining_date"])) : null,
			($row["status"] == 1) ? 'Active' : 'Deactive',
            !empty($row["created_at"]) ? date('d-m-Y h:i:a',strtotime($row["created_at"])) : null,
        ];
    }
}
