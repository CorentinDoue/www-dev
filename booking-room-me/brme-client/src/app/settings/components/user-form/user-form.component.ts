import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from '@angular/forms';
import {User} from '../../models/user.model';
import * as fromUserForm from '../../reducers/user-form.reducer';
import {Store} from '@ngrx/store';


@Component({
  selector: 'brme-user-form',
  templateUrl: './user-form.component.html',
  styleUrls: ['./user-form.component.scss']
})
export class UserFormComponent implements OnInit {
  ispending;

  @Input()
  set pending(isPending: boolean) {
    if (isPending) {
      this.form.disable();
      this.ispending = true;
    } else {
      this.form.enable();
      this.ispending = false;
    }
  }
  @Input() emailDisable = false;
  @Input() errorMessage: string | null;
  @Input() successMessage: string | null;
  @Input() verb: string;

  @Input()
  set user (user: User | null) {
    if (user !== null) {
      this.form.patchValue(user);
      this.role.patchValue(this.parseRole(user.role));
    }
  }

  @Output() submitted = new EventEmitter<User>();

  form: FormGroup = this.fb.group({
    id: [null],
    email: ['', [ Validators.required, Validators.email ]],
    firstname: ['', Validators.required],
    lastname: ['', Validators.required],
    type: [''],
    bedRoomNumber: [''],
    role: ['ROLE_ASSO']
  });

  get email() { return this.form.get('email'); }
  get firstname() { return this.form.get('firstname'); }
  get lastname() { return this.form.get('lastname'); }
  get type() { return this.form.get('type'); }
  get bedRoomNumber() { return this.form.get('bedRoomNumber'); }
  get role() { return this.form.get('role'); }

  constructor(private fb: FormBuilder, private store: Store<fromUserForm.State>) {}

  ngOnInit() {
    this.email[!this.emailDisable ? 'enable' : 'disable']();
  }

  submit() {
    if (this.form.valid) {
      if (!this.emailDisable) {this.form.removeControl('id'); }
      this.role.patchValue(this.unparseRole(this.role.value));
      this.submitted.emit(this.form.value);
    }
  }

  getErrorMessage(formControl: FormControl) {
    return formControl.hasError('required') ? 'Ce champs ne doit pas être vide' :
      formControl.hasError('email') ? 'L\'email n\'est pas valide' : '';
  }

  parseRole(role: string | null) {
    if (role === null ) {
      return 'USER';
    } else {
      return role;
    }

  }

  unparseRole(role: string | null) {
    if (role === 'USER' ) {
      return null;
    } else {
      return role;
    }

  }

}
