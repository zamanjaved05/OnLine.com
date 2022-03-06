<?php

namespace App\Exports;

use App\Models\Withdrawals;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Donations;

class WithdrawlsExport extends BaseExport implements FromCollection, WithHeadings, Responsable, WithMapping
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Withdrawals::join('campaigns', 'campaigns.id', '=', 'withdrawals.campaigns_id')
            ->join('communities', 'communities.id', 'campaigns.community_id')
            ->select([
                'withdrawals.id',
                'campaigns.title as campaign',
                'communities.name as community',
                'withdrawals.amount',
                'withdrawals.gateway',
                'withdrawals.status',
                'withdrawals.date',
            ])
            ->where('campaigns.title', 'LIKE', '%' . $this->query . '%')
            ->sortable(['id' => 'desc'])
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Registered Member',
            'Campaign',
            'Community',
            'Amount',
            'Method',
            'Status',
            'Date',
            'Time'
        ];
    }

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $donation = Donations::all();
        //  dd($user);
        $user_id=if($donation->user_id == 0){
        echo 'No' ;                   }
    else{
        echo 'Yes';}
        //@if($row->user_id == 0)'No' @else 'Yes'@endif
        return [
            $row->id,
            $row->user_id=$user_id,
            $row->campaign,
            $row->community,
            $row->amount,
            $row->gateway,
            $row->status,
            date('d M, y', strtotime($row->date)),
            date('g:i A', strtotime($row->date)),
        ];
    }

    public function toResponse($request)
    {
        // TODO: Implement toResponse() method.
    }
}
