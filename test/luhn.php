<?php

use function Krak\Luhn\luhn_validate,
    Krak\Luhn\luhn_checksum;


describe('Luhn', function() {
    describe('#luhn_validate', function() {
        it('returns true on a valid mod10 number', function() {
            assert(luhn_validate('79927398713'));
        });
    });
    describe('#luhn_checksum', function() {
        it('returns the proper luhn checksum of a sequence', function() {
            assert(67 == luhn_checksum('7992739871'));
        });
    });
});
