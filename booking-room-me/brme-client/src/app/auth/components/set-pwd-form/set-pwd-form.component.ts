import {Component, EventEmitter, Input, OnInit, Output} from '@angular/core';
import {AbstractControl, FormControl, FormGroup, ValidatorFn, Validators} from '@angular/forms';
import {SetPassword} from '../../models/auth.model';

@Component({
  selector: 'brme-set-pwd-form',
  templateUrl: './set-pwd-form.component.html',
  styleUrls: ['./set-pwd-form.component.scss']
})
export class SetPwdFormComponent implements OnInit {
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

  @Input() successMessage: string | null;

  @Output() submitted = new EventEmitter<SetPassword>();

  form: FormGroup = new FormGroup({
    formerPwd: new FormControl('', [ Validators.required]),
    newPwd: new FormControl('', [ Validators.required]),
    confirmPwd: new FormControl('', [ Validators.required ]),
  }, {validators: this.pwdMatchValidator()});

  get formerPwd() { return this.form.get('formerPwd'); }
  get newPwd() { return this.form.get('newPwd'); }
  get confirmPwd() { return this.form.get('confirmPwd'); }

  constructor() {}

  ngOnInit() {}

  submit() {
    if (this.form.valid) {
      this.submitted.emit({formerPwd: this.formerPwd.value, newPwd: this.newPwd.value});
    }
  }

  getErrorMessage(formControl: FormControl) {
    return formControl.hasError('required') ? 'Ce champs ne doit pas être vide' :
      formControl.hasError('passwordDoesNotMatch') ? 'Les mots de passes doivent être identiques' : '';
  }

  getFormError(form: FormGroup) {
    if ( form.controls['newPwd'].touched && form.controls['confirmPwd'].touched && form.invalid) {
      return 'Les mots de passes doivent être identiques';
    } else {
      return null;
    }
  }

  pwdMatchValidator(): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} | null => {
      let forbidden;
      if ( control && control['controls']['confirmPwd']) {
        forbidden = control['controls']['confirmPwd'].value !== control['controls']['newPwd'].value;
      } else {
        forbidden = false;
      }
      return forbidden ? {'passwordDoesNotMatch': {value: control.value}} : null;
    };
  }
}



