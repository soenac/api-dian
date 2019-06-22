<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Prefix
     * @var string
     */
    public $prefix = 'csv';
    
    /**
     * Tables
     * @var array
     */
    public $tables = [
        'type_organizations' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'countries' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'departments' => [
            'columns' => 'id, country_id, name, code, @created_at, @updated_at'
        ],
        'municipalities' => [
            'columns' => 'id, department_id, name, code, @created_at, @updated_at'
        ],
        'type_document_identifications' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'taxes' => [
            'columns' => 'id, name, description, code, @created_at, @updated_at'
        ],
        'type_regimes' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'type_liabilities' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'payment_forms' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'payment_methods' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'discounts' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'type_currencies' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'unit_measures' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'reference_prices' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'type_documents' => [
            'columns' => 'id, name, code, cufe_algorithm, @created_at, @updated_at'
        ],
        'type_item_identifications' => [
            'columns' => 'id, name, code, code_agency, @created_at, @updated_at'
        ],
        'type_operations' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'type_environments' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
        'languages' => [
            'columns' => 'id, name, code, @created_at, @updated_at'
        ],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ($this->tables as $key => $table) {
            DB::connection()
                ->getpdo()
                ->exec("LOAD DATA LOCAL INFILE '".public_path($this->prefix.DIRECTORY_SEPARATOR."{$key}.{$this->prefix}")."' INTO TABLE $key({$table['columns']}) SET created_at = NOW(), updated_at = NOW()");
        }
    }
}
