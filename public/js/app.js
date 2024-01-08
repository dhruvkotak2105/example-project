var Document = function () {
  var initDocumentValidation = function initDocumentValidation() {
    $("#documentForm").validate({
      rules: {
        name: {
          required: true,
          maxlength: 191
        },
        email: {
          required: true,
          email: true
        },
        address: {
          required: true
        },
        date: {
          required: true
        }
        // time :{
        //     required: true,
        // },
      },

      messages: {
        name: {
          required: "Name is required.",
          maxlength: "Name exceeded maximum limit"
        },
        address: {
          required: "Name is required."
        },
        date: {
          required: "Date is required."
        },
        email: {
          required: "Email Address is Required.",
          email: "Please enter a valid email address."
        }
      }
    });
  };
  return {
    init: function init() {
      initDocumentValidation();
    }
  };
}();
jQuery(Document).ready(function () {
  Document.init();
});
