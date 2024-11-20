                            <div>
                                <p class="font-medium">Categories</p>
                                {{-- <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">All Contents</label>
                                </div> --}}
                                @foreach ($this->category as $category)
                                    <div class="flex items-center gap-6 mt-6">
                                        <input type="checkbox" value="{{ $category->id }}" wire:model.defer='CheckCategories' wire:change='SelectedCategories' class="w-5 h-5">
                                        <label for="" class="text-sm text-princess font-medium">{{ $category->title }}</label>
                                    </div>
                                @endforeach


                                {{-- <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">eSports</label>
                                </div>
                                <div class="flex items-center gap-6 mt-6">
                                    <input type="checkbox" class="w-5 h-5" name="" id="">
                                    <label for="" class="text-sm text-princess font-medium">Lorem ipsum</label>
                                </div> --}}
                            </div>
