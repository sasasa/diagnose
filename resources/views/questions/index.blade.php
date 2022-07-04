<x-app>
  <h2>できるだけ短時間で答えよう︕</h2>
  <form action="{{ route('question.answer') }}" method="post">
    @csrf
    @foreach ($questionTemplates as $questionTemplate)
      <div>
        {{ $questionTemplate->content }}
        <div class="button-radio">
          <input id="radio_{{ $questionTemplate->id }}_on" type="radio" name="question[{{ $questionTemplate->id }}]" value="1">
          <label for="radio_{{ $questionTemplate->id }}_on">はい</label>
          <input id="radio_{{ $questionTemplate->id }}_off" type="radio" name="question[{{ $questionTemplate->id }}]" value="0">
          <label for="radio_{{ $questionTemplate->id }}_off">いいえ</label>
        </div>
      </div>
    @endforeach
    <div>
      <button  type="submit" class="border p-2 rounded-md bg-red-400 text-white">次へ</button>
    </div>
  </form>
</x-app>