function Main()
    function r = HexCharToDec(x)
        hexa = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
        deci = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
        r = deci(hexa==x);
    end

    function r = DecCharToHex(x)
        hexa = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
        deci = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
        r = hexa(deci==x);
    end

    function r = DecimalToBinary(x, n)
        r = [];
        temp = x;
        while temp > 0
            r(end+1) = mod(temp, 2);
            temp = floor(temp / 2);
        end
        if exist('n','var')
            aL = n-length(r);
            while aL > 0
                r(end+1) = 0;
                aL = aL - 1;
            end
        end
        
        r = fliplr(r);
    end
    
    function r = HexToBinary(x)
        r = [];
        for k = 1:length(x)
             r = cat(2, r, DecimalToBinary(HexCharToDec(x(k)),4));
        end
    end

    %Most Valuable Bit on Left
    function r = ToDecimalMVBL(x, base)
        r=0;
        sum=0;
        x = fliplr(x);
        for k=1:length(x)
            sum = sum + (x(k) * power(base,k-1));
        end
        r=sum;
    end

    function r = DevideToNibbles(x)
        arr = [];
        a = [0,0,0,0];
        s=1;
        for k=1:length(x)     
            a(s)=x(k);
            s=s+1;
            if mod(k,4) == 0
                arr=cat(1,arr,a);
                a = [];
                s=1;
            end
        end
        if length(a)<4 && ~isempty(a)
            for i=1:4-length(a)
                a(end+1)=0;
            end
            arr=cat(1,arr,a);
        end
        r=arr;
    end

    %Most Valuable Bit on Left
    function r = BinaryToHexMVBL(x)
        r=[];
        x = fliplr(x);
        arr = DevideToNibbles(x);
        arr=arr';
        for k=arr
            kt=k';
            d = ToDecimalMVBL(fliplr(kt), 2);
            r(end+1) = DecCharToHex(d);
        end
        r=fliplr(r);
        r=char(r);
    end

%               Decimal to Binary 1.1
    disp("Mine: ")
    disp(DecimalToBinary(100))
    disp("Lib: ")
    disp(decimalToBinaryVector(100))
    
%               Hex to Binary 1.2
    disp("Mine: ")
    disp(HexToBinary('AE'))
    disp("Lib: ")
    disp(hexToBinaryVector('AE'))
    
%               Binary to Decimal 1.3
    disp("Mine: ")
    disp(ToDecimalMVBL([1,0,1,0], 2))
    disp("Lib: ")
    disp(binaryVectorToDecimal([1,0,1,0]))
    
%               Binary to Hex 1.4
    disp("Mine: ")
    disp(BinaryToHexMVBL([1,0,1,0]))
    disp("Lib: ")
    disp(binaryVectorToHex([1,0,1,0]))
end