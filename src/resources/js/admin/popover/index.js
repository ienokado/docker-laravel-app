import 'bootstrap';

export default (function () {
  // ------------------------------------------------------
  // @Popover
  // ------------------------------------------------------

  $('[data-toggle="popover"]').popover();

  // ------------------------------------------------------
  // @Tooltips
  // ------------------------------------------------------

  $('[data-toggle="tooltip"]').tooltip();
}());