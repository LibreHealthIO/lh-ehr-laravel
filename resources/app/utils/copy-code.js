(function(cash) {
  "use strict";

  // Copy original code
  cash("body").on("click", ".copy-code", function() {
    let elementId = cash(this).data("target");
    cash(elementId)
      .find("input")[0]
      .select();
    cash(elementId)
      .find("input")[0]
      .setSelectionRange(0, 99999);
    document.execCommand("copy");
  });
})(cash);
