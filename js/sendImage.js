const imagem = document.getElementById('imagem');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
    fileChosen.textContent = this.files[0].name
})