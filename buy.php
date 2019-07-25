echo ( "
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form action = "/exchange.php?=".$market.>
  <div class="form-group row">
    <label class="col-4 col-form-label" for="Amount (BTC)">Amount (BTC)</label> 
    <div class="col-8">
      <div class="input-group">
        <input id="Amount (BTC)" name="Amount (BTC)" placeholder="0.01" type="text" aria-describedby="Amount (BTC)HelpBlock" required="required" class="form-control"> 
        <div class="input-group-append">
          <div class="input-group-text">BTC</div>
        </div>
      </div> 
      <span id="Amount (BTC)HelpBlock" class="form-text text-muted">Enter the amount you wish to purchase in BTC</span>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
 ");
