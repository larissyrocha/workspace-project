function clickMenu() {
    if (lista.style.display == 'block') {
        lista.style.display = 'none';
    } else {
        lista.style.display = 'block';
    }
}

const textarea = document.getElementsByClassName('mytext');

textarea.addEventListener('input', function() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});

