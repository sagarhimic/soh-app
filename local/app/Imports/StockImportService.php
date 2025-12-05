<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\StockUpdate;

class StockImportService
{
    protected $tableColumns = [
        'Adilabad',
        'Komuram_Bheem_Asifabad',
        'Mancherial',
        'Nirmal',
        'Khammam',
        'Bhadradri_Kothagudem',
        'Hanumakonda',
        'Jangaon',
        'Jayashankar_Bhupalpally',
        'Mahabubabad',
        'Mulugu',
        'Warangal',
        'Hyderabad',
        'Medchal_Malkajgiri',
        'Nizamabad',
        'Kamareddy',
        'Karimnagar',
        'Peddapalli',
        'Rajanna_Sircilla',
        'Jagtial',
        'Mahabubnagar',
        'Narayanpet',
        'Jogulamba_Gadwal',
        'Nagarkurnool',
        'Wanaparthy',
        'Nalgonda',
        'Suryapet',
        'Yadadri_Bhongir',
        'Ranga_Reddy',
        'Vikarabad',
        'Sangareddy',
        'Medak',
        'Siddipet',
        'quarantine_stock',
        'pending_supply',
        'consumption'
    ];

    /**
     * Process full sheet.
     */
    public function processSheet(array $rows, $importDate)
    {
        $header = $rows[0]; // First row is header
        unset($rows[0]);

        foreach ($rows as $row) {
            $this->processRow($row, $header, $importDate);
        }
    }

    /**
     * Process single item row.
     */
    public function processRow($row, $header, $importDate)
    {
        // 1. Item code is first column
        $itemCode = trim($row[6] ?? '');

        if (!$itemCode) {
            return;
        }

        // 2. Find item_id
        $item = Item::where('item_code', $itemCode)->first();

        if (!$item) {
            return; // skip missing item codes
        }

        // 3. Prepare record data array
        $data = [
            'item_id'     => $item->id,
            'date'        => $importDate
        ];

        // 4. Loop Excel columns & map to DB columns
        foreach ($header as $index => $columnName) {

            $col = trim($columnName);

            if (in_array($col, $this->tableColumns, true)) {

                $val = $row[$index] ?? 0;

                if ($val === null || $val === '' || $val === '-') {
                    $val = 0;
                }

                $data[$col] = (float)$val;
            }
        }

        // 5. Insert or Update
        StockUpdate::updateOrCreate(
            [
                'item_id'     => $item->id,
                'date'        => $importDate
            ],
            $data
        );
    }
}
