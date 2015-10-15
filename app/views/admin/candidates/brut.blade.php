@foreach($candidates as $candidate)
    {{ $candidate->name }} {{ $candidate->postal_code }} {{ $candidate->city }} {{ $candidate->postal_address }}
@endforeach
