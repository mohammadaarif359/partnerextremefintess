<?php

namespace App\Exports;

use App\Models\GymPlan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Auth;

class GymPlanExport implements FromCollection, WithHeadings, WithMapping
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
		return GymPlan::where('partner_id',$this->partner_id)->get();
    }

    /**
     * @return array[]
     */
    public function headings(): array
    {
        return array("Title","Duration","Amount","Description","Status","Created At");
    }
	/**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            @$row["title"],
            @$row["duration"],
            @$row["amount"],
			$row["description"],
			($row["status"] == 1) ? 'Active' : 'Deactive',
            !empty($row["created_at"]) ? date('d-m-Y h:i:a',strtotime($row["created_at"])) : null,
        ];
    }
}
