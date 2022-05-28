function findOption(select, getQuer, rooms, metro, priceStart, priceEnd) {
    const option = select.querySelector(`option[value="${select.value}"]`)
    if(option.text=="По цене возрастанию"){
        console.log(JSON.parse(rooms));
      //  window.location.href = 'ads.php?type='+ getQuer +'&costd=ASC'+'&room[]='+rooms+'&metro='+metro+'&priceStart='+priceStart+'&priceEnd='+priceEnd;
    }else if(option.text=="По цене убыванию"){
        console.log(JSON.parse(rooms));
       // window.location.href = 'ads.php?type='+ getQuer +'&costd=DESC'+'&room[]='+rooms+'&metro='+metro+'&priceStart='+priceStart+'&priceEnd='+priceEnd;
    }
 }