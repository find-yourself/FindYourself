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
  let tendencySign;
  let tendencyArt;
  let tendencyNature;
  let tendencyPerformer;
  let tendencyCreativity;

  let abilityHuman;
  let abilityTechnique;
  let abilitySign;
  let abilityArt;
  let abilityNature;
  let abilityPerformer;
  let abilityCreativity;



  function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  }

  $('#block-0 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-1 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-2 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-3 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-4 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-5 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-6 .solimin-heading').text('Я хочу (мне нравится, меня привлекает, я предпочитаю');
  $('#block-7 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-8 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-9 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-10 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-11 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-12 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');
  $('#block-13 .solimin-heading').text('Я могу (способен, умею, обладаю навыками');

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

  $('.answer-link').on('click', function(e) {

    e.preventDefault();

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
        tendencySign = getResults(parent);
        go = isNumeric(tendencySign);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-3':
        tendencyArt = getResults(parent);
        go = isNumeric(tendencyArt);
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
        abilitySign = getResults(parent);
        go = isNumeric(abilitySign);
        if(go === true) {
          changeDisplay(parent);
        }
        break;
      case 'block-10':
        abilityArt = getResults(parent);
        go = isNumeric(abilityArt);
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


    let arr = [tendencyHuman, tendencyTechnique, tendencySign, tendencyArt, tendencyNature, tendencyPerformer, tendencyCreativity, abilityHuman, abilityTechnique, abilitySign, abilityArt, abilityNature, abilityPerformer, abilityCreativity];

    let jsonString = JSON.stringify(arr);
    console.log(jsonString);

    $.ajax({
          url: '/site/answer',
          type: 'POST',
          data: {data : jsonString}, 
          cache: false,
  
          success: function(){
              console.log('ok');
          }
        });

  
  });

    // Обработчик Йоваши

  $('.answer-yvashi-link').on('click', function(){
     
      let parent = $(this).parent();
      let parentName = $(this).parent().attr('id');
      let go;
      let arr = getResultsYovashi(parent);
      console.log(arr);
  });

  function changeDisplayYovashi(parent) {
    let id = +($(parent).attr('data-id'));

    if($("div").is(`#block-yvashi-${id + 1}`)) {
      parent.css('display', 'none');
      $(`#block-yvashi-${id + 1}`).css('display', 'block');

    } else {
      console.log('no me');
      $('.answer-yvashi-link').css('display', 'none');
      $('.result-yvashi').css('display', 'inline-block');

    }
  };

  function getResultsYovashi(parent) {

    let allLinks = $(parent).find('.block-links-yvashi');
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
      return allValue;
    }
  };

});








