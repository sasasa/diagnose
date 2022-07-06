<x-app>
  <h2>できるだけ短時間で答えよう︕</h2>
  <form id="questionForm" action="{{ route('question.answer') }}" method="post">
    @csrf
    @foreach ($questionTemplates as $questionTemplate)
      <div>
        {{ $questionTemplate->content }}
        <div class="button-radio">
          <input onchange="checkRadioButton()" id="radio_{{ $questionTemplate->id }}_on" type="radio" name="question[{{ $questionTemplate->id }}]" value="1">
          <label for="radio_{{ $questionTemplate->id }}_on">はい</label>
          <input onchange="checkRadioButton()" id="radio_{{ $questionTemplate->id }}_off" type="radio" name="question[{{ $questionTemplate->id }}]" value="0">
          <label for="radio_{{ $questionTemplate->id }}_off">いいえ</label>
        </div>
      </div>
    @endforeach
    <div>
      <button id="nextBtn" onclick="pushNextBtn()" type="button" class="border p-2 rounded-md bg-red-400 text-white">すべて選択してください</button>
    </div>
  </form>
@push('scripts')
  <script>
  function pushNextBtn()
  {
    if(testRadioButton()) {
      document.getElementById('questionForm').submit();
    }
  }
  function checkRadioButton()
  {
    if(testRadioButton()) {
      document.getElementById('nextBtn').innerHTML = '次へ';
    }
  }
  function testRadioButton()
  {
    const requiredNumber = {{ $questionTemplates->count() }};
    let counter = 0;
    document.querySelectorAll('input[type="radio"]').forEach((input) => {
      if(input.checked) {
        counter++;
      }
    });
    if(requiredNumber <= counter) {
      return true;
    } else {
      return false;
    }
  }
  </script>
@endpush
</x-app>