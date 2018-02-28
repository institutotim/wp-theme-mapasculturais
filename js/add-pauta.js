(function($) {
  var $form, $steps, $next, $prev, $create, currentStep;

  function init() {
    $form = $("form#new_pauta");
    $steps = $(".add-pauta-step");
    $next = $(".add-pauta-next");
    $prev = $(".add-pauta-prev");
    $create = $(".add-pauta-create");

    // Wait for scripts to load
    setTimeout(function() {
      goStep(1);
    }, 1000);
  }

  function bindings() {
    $form.on("submit", function(ev) {
      if (currentStep < $steps.length) {
        ev.preventDefault();
        nextStep();
      }
    });
    $next.bind("click", function(ev) {
      ev.preventDefault();
      nextStep();
    });
    $prev.bind("click", function(ev) {
      ev.preventDefault();
      prevStep();
    });
  }

  function goStep(i) {
    if (i < 1) {
      i = 1;
    }
    var $step = $steps.filter('[data-step="' + i + '"]');
    if ($step && $step.length) {
      currentStep = i;
      $steps.hide();
      $step.show();
    }
    window.scrollTo(0, 0);
    handleButtons();
  }

  function handleButtons() {
    if (currentStep >= $steps.length) {
      $next.hide();
      $create.show();
    } else {
      $next.show();
      $create.hide();
    }
    if (currentStep == 1) {
      $prev.hide();
    } else {
      $prev.show();
    }
  }

  function nextStep() {
    goStep(currentStep + 1);
  }
  function prevStep() {
    goStep(currentStep - 1);
  }

  $(document).ready(function() {
    init();
    bindings();
  });
})(jQuery);
