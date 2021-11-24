@if (!$success)
<div>
    <div class="card-header">
        <h2>{{ $questionnaire->name }}</h2>
    </div>
    @foreach($questions as $question)
    <div class="card-body" style="background-color: skyblue; margin: 1rem 0.5rem 1rem 0.5rem;">
        <h5 class="card-title">
            {{ $question->question }}
        </h5>
        <div class="row justify-content-center">
            <div class="card" style="width: 55%;">
                @if ( $question->question_subtyp == "Válaszokkal")
                    @foreach ( $answersFromDB as $answer )
                        @if ( $answer->questions_id == $question->id )
                            <button wire:click="clickedAnswer({{ $question->id }}, '{{ $answer->answer }}')">{{ $answer->answer }}</button>
                        @endif
                    @endforeach
                @endif
                @if ( $question->question_subtyp == "Igaz-hamis")
                    <button wire:click="clickedAnswer({{ $question->id }}, 'Igaz')">Igaz</button>
                    <button wire:click="clickedAnswer({{ $question->id }}, 'Hamis')">Hamis</button>
                @endif
                @if ( $question->question_subtyp == "Szabadszavas")
                    <input type="text" wire:model="answerInput">
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <button id="{{ $question->id }}" wire:click="saveAnswers">Befejez</button>
</div>
@endif

@if($success)
<div>
    <h2>Sikeres kitöltés!</h2>
    <button class="button btn-secondary" wire:click="setNew">Új kérdőív</button>
    <button class="button btn-primary" wire:click="toHome">Kezdőlap</button>
</div>
@endif
