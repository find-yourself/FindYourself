$(document).ready(function(){

    $('.owl-carousel').owlCarousel({
      loop: false,
      margin: 10,
      nav: false,
      items: 1,
      dots: true,
  });



// ------------Обработчик теста Соломина

  function getResults(parent) {

    let allLinks = $(parent).find('.block-links');
    let allValue = [];

    for(let i = 0; i < allLinks.length; i++) {
      let allInput = $(allLinks[i]).find('input');

      for(let j = 0; j < allInput.length; j++) {
        let prop = $(allInput[j]).prop('checked');
        if(prop === true) {
          checked = true;
          allValue.push($(allInput[j]).val());
        }
      }

    }

    if(allValue.length < 5) {
      alert('Ответьте на все вопросы');
    } else {

      let sum = 0;
      
      for(let i = 0; i < allValue.length; i++){
        let number = +(allValue[i])
        sum += number;
        }
        return sum;
    }
  };
    
  let tendencyHuman;
  let tendencyTechnique;
  let tendencySignSystem;
  let tendencyArtImage;
  let tendencyNature;
  let tendencyPerformer;
  let tendencyCreativity;

  let abilityHuman;
  let abilityTechnique;
  let abilitySignSystem;
  let abilityArtImage;
  let abilityNature;
  let abilityPerformer;
  let abilityCreativity;

  function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  }

  function changeDisplay(parent) {
    let id = +($(parent).attr('data-id'));

    if($("div").is(`#block-${id + 1}`)) {
      parent.css('display', 'none');
      $(`#block-${id + 1}`).css('display', 'block');

    } else {
      console.log('no me');
      $('.answer-link').css('display', 'none');
      $('.result').css('display', 'inline-block');

    }
  };

  $('.answer-link').on('click', function() {

    let parent = $(this).parent();
    let parentName = $(this).parent().attr('id');
    let go;
    
    switch(parentName){
      case 'block-0':
        tendencyHuman = getResults(parent);
        go = isNumeric(tendencyHuman);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-1':
        tendencyTechnique = getResults(parent);
        go = isNumeric(tendencyTechnique);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-2':
        tendencySignSystem = getResults(parent);
        go = isNumeric(tendencySignSystem);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-3':
        tendencyArtImage = getResults(parent);
        go = isNumeric(tendencyArtImage);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-4':
        tendencyNature = getResults(parent);
        go = isNumeric(tendencyNature);
        if(go === true) {
          changeDisplay(parent);
        }        
        break;
      case 'block-5':
        tendencyPerformer = getResults(parent);
        go = isNumeric(tendencyPerformer);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-6':
        tendencyCreativity = getResults(parent);
        go = isNumeric(tendencyCreativity);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-7':
        abilityHuman = getResults(parent);
        go = isNumeric(abilityHuman);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-8':
        abilityTechnique = getResults(parent);
        go = isNumeric(abilityTechnique);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-9':
        abilitySignSystem = getResults(parent);
        go = isNumeric(abilitySignSystem);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-10':
        abilityArtImage = getResults(parent);
        go = isNumeric(abilityArtImage);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-11':
        abilityNature = getResults(parent);
        go = isNumeric(abilityNature);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-12':
        abilityPerformer = getResults(parent);
        go = isNumeric(abilityPerformer);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-13':
        abilityCreativity = getResults(parent);
        go = isNumeric(abilityCreativity);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
    }

  });


  $('.result').on('click', function() {

    let formData = new FormData();
    formData.append('tendencyHuman', tendencyHuman);
    formData.append('tendencyTechnique', tendencyTechnique);
    formData.append('tendencySignSystem', tendencySignSystem);
    formData.append('tendencyArtImage', tendencyArtImage);
    formData.append('tendencyNature', tendencyNature);
    formData.append('tendencyPerformer', tendencyPerformer);
    formData.append('tendencyCreativity', tendencyCreativity);
    formData.append('abilityHuman', abilityHuman);
    formData.append('abilityTechnique', abilityTechnique);
    formData.append('abilitySignSystem', abilitySignSystem);
    formData.append('abilityArtImage', abilityArtImage);
    formData.append('abilityNature', abilityNature);
    formData.append('abilityPerformer', abilityPerformer);
    formData.append('abilityCreativity', abilityCreativity);

    $.ajax({
        url: '/site/answer',
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function(formData){
          console.log(formData)
        },
        error: function(error){
          console.log('fail');
          }
      });

  
  });



});








