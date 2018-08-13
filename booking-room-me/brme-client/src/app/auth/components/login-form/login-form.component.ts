import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {FormControl, FormGroup, Validators} from '@angular/forms';
import {Credentials} from '../../models/auth.model';

@Component({
  selector: 'brme-login-form',
  templateUrl: './login-form.component.html',
  styleUrls: ['./login-form.component.scss']
})
export class LoginFormComponent implements OnInit {
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

  @Input() errorMessage: string | null;

  @Output() submitted = new EventEmitter<Credentials>();

  form: FormGroup = new FormGroup({
    email: new FormControl('', [ Validators.required, Validators.email ]),
    password: new FormControl('', Validators.required),
    remember: new FormControl(true)
  });

  get email() { return this.form.get('email'); }
  get password() { return this.form.get('password'); }

  constructor() {}

  ngOnInit() {}

  submit() {
    if (this.form.valid) {
      this.submitted.emit(this.form.value);
    }
  }

  getErrorMessage(formControl: FormControl) {
    return formControl.hasError('required') ? 'Ce champs ne doit pas être vide' :
      formControl.hasError('email') ? 'L\'email n\'est pas valide' : '';
  }
}
