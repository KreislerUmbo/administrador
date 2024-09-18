 <div>
     <form wire:submit="save">
         <div class="card">
             <x-validation-errors class="mb-4" />

             <div class="mb-4">

                 <x-label class="mb-2">
                     Familias
                 </x-label>
                 <x-select class=" w-full" wire:model.live="subcategory.family_id">
                     <option value="" disabled>
                         Seleccione una Familia
                     </option>
                     @foreach ($families as $family)
                         <option value="{{ $family->id }}">{{ $family->name }}</option>
                     @endforeach
                 </x-select>
             </div>
             <div class="mb-4">
                 <x-label class="mb-2">
                     Categorías
                 </x-label>

                 <x-select name="category_id" class="w-full" wire:model.live="subcategory.category_id">
                    <option value="" disabled>Seleccione una Categoría</option>
                     @foreach ($this->categories as $category)
                         <option value="{{ $category->id }}">
                             {{ $category->name }}
                         </option>
                     @endforeach
                 </x-select>
             </div>

             <div class="mb-4">
                 <x-label class=" mb-2 text-left font-semibold">
                     Nombre de la Subcategoría
                 </x-label>
                 <x-input class=" w-full" placeholder="Ingrese el nombre de la subcategoria"
                 wire:model="subcategory.name" />
             </div>
             <div class="mb-4">
                 <a class="btn btn-orange" href="{{ route('admin.subcategories.index') }}">Regresar</a>
                 <x-button class=" flex justify-end">Guardar</x-button>
             </div>
         </div>
     </form>

 </div>
