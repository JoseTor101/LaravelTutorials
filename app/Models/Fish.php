<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Fish extends Model
{
    use HasFactory;

    /**
     * FISH ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the fish name
     * $this->attributes['species'] - string - contains the fish description
     * $this->attributes['weight'] - float - contains the fish weight
     * $this->attributes['created_at'] - Carbon - contains the fish creation date
     * $this->attributes['updated_at'] - Carbon - contains the fish update date
     */
    protected $table = 'fishes';

    protected $fillable = ['name', 'species', 'weight'];


    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setSpecies(string $species): void
    {
        $this->attributes['species'] = $species;
    }

    public function getSpecies(): string
    {
        return $this->attributes['species'];
    }

    public function setWeight(float $weight): void
    {
        $this->attributes['weight'] = $weight;
    }

    public function getWeight(): float
    {
        return $this->attributes['weight'];
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updateAt = null)
    {
        $this->attributes['updated_at'] = Carbon::now();
    }

    public function validate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'species' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

}