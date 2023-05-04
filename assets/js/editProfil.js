let editPet = document.querySelectorAll("[name='editPet']");
let breedPet = document.querySelectorAll("[name = 'breedPet']");
editPet.forEach((edit) => {
  edit.addEventListener("click", async (e) => {
    let editClick = e.target.dataset.editPet;
    console.log(editClick);

    breedPet.forEach((breed) => {
      let breedClick = breed.dataset.breedPet;
      
      let editBreedPet = breed.dataset.editBreed;

      console.log(editBreedPet);
      if (breedClick == editClick) {
        breed.style.display = "none";
        editBreed.style.display = "block";
      }
    });
  });
});
