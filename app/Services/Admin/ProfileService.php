<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProfileService
{
    /**
     * Update user profile with image upload
     */
    public function updateProfile($user, $data)
    {
        try {
            if (isset($data['image']) && $data['image']) {
                $data['image'] = $this->uploadImage($data['image'], $user);
            } else {
                unset($data['image']);
            }

            if (isset($data['password']) && $data['password']) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            $user->update($data);

            return [
                'success' => true,
                'message' => __('Profile updated successfully!')
            ];
        } catch (\Exception $e) {
            Log::error('Profile update failed: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => __('Failed to update profile. Please try again')
            ];
        }
    }

    private function uploadImage($image, $user)
    {
        try {
            $defaultImages = ['user-icon', 'user-icon.png', 'user-icon.jpg', 'user-icon.jpeg'];

            if (
                $user->image &&
                !in_array($user->image, $defaultImages) &&
                Storage::disk('public')->exists('users/' . $user->image)
            ) {
                Storage::disk('public')->delete('users/' . $user->image);
            }

            $imageName = time() . '_' . $user->id . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('users', $imageName, 'public');

            if (!$path) {
                throw new \Exception('Failed to store image');
            }

            return $imageName;
        } catch (\Exception $e) {
            Log::error('Image upload failed: ' . $e->getMessage());
            throw $e;
        }
    }
}
