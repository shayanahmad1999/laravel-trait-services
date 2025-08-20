<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Trait\SampleTrait;
use Illuminate\Http\Request;

class TraitController extends Controller
{
    use SampleTrait;

    public function getHello()
    {
        return $this->sayHello('Shayan');
    }

    public function getCode()
    {
        return $this->generateCode(12);
    }

    public function getFormatDate()
    {
        $user = User::first();

        $joined = $this->formatDate($user->created_at);
        $lastLogin = $this->humanReadable($user->created_at);

        echo $joined . "<br />" . $lastLogin;
    }

    public function store1(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);

        $slug = $this->uniqueSlug1(Post::class, $request->title);

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
        ]);

        return back()->with('success', 'Post created with slug: ' . $slug);
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->validatePayload($request, [
                'title'   => ['required', 'string', 'max:255'],
                'content' => ['required', 'string'],
                'status'  => ['required', 'in:draft,published'],
            ]);

            $validated['slug'] = $this->uniqueSlug(Post::class, $validated['title']);

            $post = new Post();
            $post->fill($this->mapToFillable($validated, $post))->save();

            return $this->ok($post, 'Post created', 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->jsonFail('Validation failed', 422, $e->errors());
        } catch (\Throwable $e) {
            return $this->jsonFail('Unable to create post', 500);
        }
    }

    public function update(Request $request, Post $post)
    {
        try {
            $validated = $this->validatePayload($request, [
                'title'   => ['sometimes', 'required', 'string', 'max:255'],
                'content' => ['sometimes', 'required', 'string'],
                'status'  => ['sometimes', 'required', 'in:draft,published'],
            ]);

            if (array_key_exists('title', $validated)) {
                $validated['slug'] = $this->uniqueSlug(Post::class, $validated['title'], 'slug', $post->id);
            }

            $post->fill($this->mapToFillable($validated, $post))->save();

            return $this->ok($post, 'Post updated');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->jsonFail('Validation failed', 422, $e->errors());
        } catch (\Throwable $e) {
            return $this->jsonFail('Unable to update post', 500);
        }
    }
}
