
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Contact SYSTEM</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url('systems') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">Contact Dept</li>
        </ol>
    </div>
    <div class="col-md-7 align-self-center text-right d-none d-md-block">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target=".long-modal"><i
                class="fa fa-plus-circle"></i> New</button>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="tbldepartment"
                    class="display nowrap table table-hover table-striped table-bordered dataTable" role="grid"
                    aria-describedby="example23_info" style="width: 100%;" width="100%" cellspacing="0">
                    <thead>
                        <tr role="row">
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($results): ?>
                            <?php foreach ($results as $result): ?>
                                <tr>
                                    <td><?php echo $result->name; ?></td>
                                    <td><?php echo $result->company; ?></td>
                                    <td><?php echo $result->phone; ?></td>
                                    <td><?php echo $result->email; ?></td>
                                    <td>
                                        <button class="btn btn-success"
                                            onclick="editdepartmentModal(<?php echo $result->id; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger"
                                            onclick="deletetbldepartmentBtn(<?php echo $result->id; ?>)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No results found.</p>
                        <?php endif; ?>

                        <div class="mb-2">
                            <form id="searchbaridForm" onsubmit="searchbarDepartmentForm(event)">
                                <input type="text" name="query" placeholder="Search...">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </tbody>
                </table>
                <div>
                    <?php echo $links; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Contact Modal  -->
<div class="modal long-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="longmodal"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="adddepartmentidForm" onsubmit="addcontactForm(event)">
                <div class="modal-header titleModalBg">
                    <h4 class="modal-title text-light font-bold" id="longmodal">
                        Add Contact
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- <input type="hidden" name="contact[type]" value="<?php //echo $_SESSION['userdata']['user_type'] ?>"> -->
                    <div class="mt-1">
                        <label>Name</label>
                        <input type="text" class="form-control" name="contact[name]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Company</label>
                        <input type="text" class="form-control" name="contact[company]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="contact[phone]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Email</label>
                        <input type="text" class="form-control" name="contact[email]" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect text-left">
                        Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Contact Modal  -->
<div class="modal" id="editdepartmentidModal" tabindex="-1" role="dialog" aria-labelledby="longmodal"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editdepartmentidForm" onsubmit="editdepartmentForm(event)">
                <div class="modal-header titleModalBg">
                    <h4 class="modal-title text-light font-bold" id="longmodal">
                        Edit Contact
                    </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" required="required">
                    <div class="mt-1">
                        <label>Name</label>
                        <input type="text" class="form-control" name="contact[name]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Company</label>
                        <input type="text" class="form-control" name="contact[company]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="contact[phone]" required="required">
                    </div>
                    <div class="mt-1">
                        <label>Email</label>
                        <input type="text" class="form-control" name="contact[email]" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect text-left">
                        Save
                    </button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>