<?php

namespace App\Exports;

use App\Models\Partner;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;

class PartnerExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
		return Partner::with('partner_user')->withCount('partner_member')->get();
    }

    /**
     * @return array[]
     */
    public function headings(): array
    {
        return array("Name","Email","Mobile","Business Name","Owner Name","Logo","Member Count","Status","Created At");
    }
	/**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            @$row["partner_user"]["name"],
            @$row["partner_user"]["email"],
            @$row["partner_user"]["mobile"],
			$row["business_name"],
			$row["owner_name"],
			$row["logo_url"],
			@$row["partner_member_count"],
            ($row["status"] == 1) ? 'Active' : 'Deactive',
            !empty($row["created_at"]) ? date('d-m-Y h:i:a',strtotime($row["created_at"])) : null,
        ];
    }
}
