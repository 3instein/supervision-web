<x-app-layout>
  <livewire:checkout-page :userOrder="$userOrder" />

  @push('addon-script')
    <script>
      feather.replace()
    </script>
  @endpush
</x-app-layout>
