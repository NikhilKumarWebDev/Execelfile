<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;
use Symfony\Component\VarDumper\Cloner\Stub;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class StudentsImport implements ToModel,WithHeadingRow,WithUpserts,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {
        

        return new Student([
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'jobtittle' => $row['jobtittle'],
            'email' => $row['email'],
            'birthdate' => $row['birthdate'],
            'phone' => $row['phone'],
            'domain' => $row['domain'],
            'comments' => $row['comments']
        ]);
    }

        /**
	 * @param \Throwable $e
	 * @return mixed
	 */
	
    
	/**
	 * @return array
	 */

    public function rules(): array
    {
        return[
            
            // 'email'=>'required|unique:students,email',
            

        ];
    }

    /**
	 * @return array|string
	 */

     public function uniqueBy() {
        return [
            'email',
        ];
	}


   

}
