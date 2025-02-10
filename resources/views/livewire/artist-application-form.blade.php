<form class="max-w-fit mb-2" wire:submit="save">
    <label>
        Full Name:
        <input required type="text" placeholder="Enter your full name here" wire:model="fullname" />
    </label>
    <label>
        Email:
        <input wire:model="email" required type="email" placeholder="Enter your email here" />
    </label>
    <label>
        Country:
        <input wire:model="country" required type="text" placeholder="Enter your country here" />
    </label>
    <label>
        Phone Number:
        <input wire:model="phone_number" type="text" placeholder="Enter your phone number here" />
    </label>
    <label>
        Portfolio Link / Webiste:
        <input wire:model="portfolio_link" type="text" placeholder="Enter portfolio link or website" />
    </label>
    <label>
        Upload Sample photos
        <input wire:model="images" type="file" accept="image/*" multiple />
        <!-- Show Loading Message While Uploading -->
        <div wire:loading wire:target="images">Uploading...</div>
        <!-- Image Previews -->
        @if ($previewUrls)
            <div class="flex gap-2 w-40 h-50">
                @foreach ($previewUrls as $previewUrl)
                    <img src="{{ $previewUrl }}" width="100%" height="100%" />
                @endforeach
            </div>
        @endif
    </label>
    <label>
        Short Bio:
        <textarea wire:model="bio" rows="5" cols="10"></textarea>
    </label>
    <div class="grid grid-cols-3">
        <label class="col-span-2">Agree to Terms & Conditions</label>
        <input type="checkbox" wire:model="isChecked" {{ $isChecked ? 'Checked' : 'Unchecked' }} />
    </div>
    <button class="btn" type="submit">Apply</button>
</form>
