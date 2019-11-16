<div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <h4 class="tittle-w3-agileits mb-4">Horizontal Form</h4>
                            <form action="<?php echo base_url();?>member/member/compose" method="post">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">To mail</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="to_email" id="inputEmail3" placeholder="to-mail" required=""><label class="error"><?php echo form_error('to_email'); ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="subject"class="form-control" placeholder="subject" required="">
                                    </div>
                                </div>
                              <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea name="text" class="form-control" >
                                            
                                        </textarea>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Compose</button>
                                    </div>
                                </div>
                            </form>
                        </div>