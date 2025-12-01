<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['item_name'])) {
            return null;
        }
        
        return new Item([
            'name'                => $row['item_name'],
            'item_code'           => $row['item_code'] ?? null,
            'item_type_id'        => $row['item_type_id'] ?? null,
            'consumption_type_id' => $row['consumption_type_id'] ?? null,
            'category_id'         => $row['category_id'] ?? null,
            'status'              => $row['status'] ?? 'Active',
        ]);
    }
}
