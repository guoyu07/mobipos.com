 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h5>Enter the VAT percentage (Enter number only)</label>
                                        <input type="number" id="this_vat" class="form-control is-valid" placeholder="e.g 18.1">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4>Set Items as:-</h4>
                                    <br>
                                      <button type="button" class="btn btn-outline-secondary" 
                                      onclick='get_vat_value(1)'>Inclusive of VAT</button>
                                <button type="button" class="btn btn-outline-secondary"
                                 onclick='get_vat_value(2)'>Exclusive of VAT</button>
                                </div>
                               
                        </div>
                      <input type="number" name="vat_value" id="vat_value" hidden>

                            <a href="#" class="btn btn-success" style="float: right;" 
                            onclick="new_tax()">Add VAT</a>
                        </div>
                    </div>