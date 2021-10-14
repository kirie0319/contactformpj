'use stirct';

{
  const form = document.getElementById('form');

  function hankaku2Zenkaku() {
    let formValue = document.getElementById('form').value;
    let replace = formValue.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
    });
    document.getElementById('form').value = replace;
  }
  form.addEventListener('input', hankaku2Zenkaku);
}