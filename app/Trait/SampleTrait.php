<?php

namespace App\Trait;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

trait SampleTrait
{
    public function sayHello(string $name)
    {
        return "Hello {$name}! Welcome to Laravel.";
    }

    public function generateCode(int $code)
    {
        return Str::random($code);
    }

    public function formatDate($date, $format = 'd M Y')
    {
        return Carbon::parse($date)->format($format);
    }

    public function formatDateTime($dateTime, $format = 'd M Y, h:i A')
    {
        return Carbon::parse($dateTime)->format($format);
    }

    public function humanReadable($dateTime)
    {
        return Carbon::parse($dateTime)->diffForHumans();
    }

    public function generateSlug($string, $separator = '-')
    {
        return Str::slug($string, $separator);
    }

    public function uniqueSlug1($model, $string, $column = 'slug')
    {
        $slug = $this->generateSlug($string);
        $original = $slug;
        $i = 1;

        while ($model::where($column, $slug)->exists()) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }

    protected function validatePayload(Request $request, array $rules, array $messages = [], array $attributes = []): array
    {
        $v = Validator::make($request->all(), $rules, $messages, $attributes);
        if ($v->fails()) {
            throw new ValidationException($v);
        }
        return $v->validated();
    }

    protected function uniqueSlug(string $model, string $title, string $slugColumn = 'slug', ?int $ignoreId = null): string
    {
        $query = $model::query();

        $base = Str::slug($title) ?: Str::random(8);
        $slug = $base;
        $i = 1;

        $query->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId));

        while ($query->where($slugColumn, $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    protected function ok(mixed $data = null, string $message = 'OK', int $code = 200)
    {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    protected function jsonFail(string $message = 'Error', int $code = 422, mixed $errors = null)
    {
        return response()->json([
            'status'  => 'error',
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }

    protected function mapToFillable(array $validated, Model $model): array
    {
        $fillable = $model->getFillable();
        if (empty($fillable)) return $validated;

        return array_intersect_key($validated, array_flip($fillable));
    }
}
