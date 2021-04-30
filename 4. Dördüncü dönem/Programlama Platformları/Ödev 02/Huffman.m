% This code belongs to Furkan Kaya. Student number is 191216002. 
function Huffman()
    load prove.mat prove;
    
    function information = I(p)
        % This function calculates the information value of the numbers in prove list.
        information = log2(1/p);
    end

    function entropy = E(P, I)
        % This function calculates the entropy for the prove list.
        entropy=0.0;
        for m = 1:10
            entropy = entropy + (P(m) * I(m));
        end
    end

    function rDict = ReverseDict(dict)
        % This function reverses the given dictionary.
        rDict = containers.Map('KeyType', 'char','ValueType', 'int16');
        for k = 1:10
            theKey = strjoin(string(dict{k,2}), "");
            rDict(theKey) = dict{k,1};
        end
    end

    function cL = CalculateCodeLength(P, dict)
        % This function calculate expected code length for proven list.
        cL=0.0;
        for m = 1:10
            cL = cL + (P(m) * length(dict{m,2}));
        end
    end

    function itemCount = ReturnItemCountMap(l)
        % This function count every symbol in given list.
        itemCount = containers.Map('KeyType','int32','ValueType','int32');
        for m = l
            if (isKey(itemCount, m))
                itemCount(m) = itemCount(m) + 1;
                continue;
            end
            itemCount(m) = 1;
        end
    end

    function itemP = ReturnItemProbMap(M)
        % This function return probability dict based on symbol count.
        itemP = containers.Map('KeyType','int32','ValueType','double');
        for m = keys(M)
            thekey = m{1};
            count = double(M(thekey));
            itemP(thekey) = double(count/10000);
        end
    end

    function itemsI = ReturnItemInformationMap(M)
        % This function return information Map for given symbols.
        itemsI = containers.Map('KeyType','int32','ValueType','double');
        for m = keys(M)
            theKey = m{1};
            itemsI(theKey) = I(M(theKey));
        end
    end

    function encoded = ReturnHuffmanenco(list, dict)
        % This function alternative for built-in huffmanenco function.
        encoded = [];
        for m = list
            encoded = cat(2, encoded, dict{m, 2});
        end
    end

    function decoded = ReturnHuffmandeco(encoded, dict)
        % This function alternative for built-in huffmandeco function.
        rDict = ReverseDict(dict);
        decoded = [];
        part = "";
        for m = encoded
            part = strjoin([part, string(m)], "");
            if(isKey(rDict, part))
                decoded(end+1)=rDict(part);
                part = "";                
            end
        end
    end

    itemCounts = ReturnItemCountMap(prove);
    itemsP = ReturnItemProbMap(itemCounts);
    
    %% Step 1
    itemsI = ReturnItemInformationMap(itemsP);
    % {[1]}         {[2]}         {[3]}         {[4]}         {[5]}         {[6]}         {[7]}         {[8]}         {[9]}         {[10]}
    % {[3.2905]}    {[3.3452]}    {[3.3004]}    {[3.3219]}    {[3.3884]}    {[3.3644]}    {[3.3104]}    {[3.2765]}    {[3.3147]}    {[3.3104]}
    
    %% Step 2
    itemsE = E(itemsP, itemsI); 
    % E = 3.3216
    
    %% Step 3
    [dict, avglen] = huffmandict(cell2mat(keys(itemsP)), cell2mat(values(itemsP)));
    %     dict =
    %     {[ 1]}    {[  0 1 1]}
    %     {[ 2]}    {[0 0 0 1]}
    %     {[ 3]}    {[  1 0 0]}
    %     {[ 4]}    {[0 0 0 0]}
    %     {[ 5]}    {[0 0 1 1]}
    %     {[ 6]}    {[0 0 1 0]}
    %     {[ 7]}    {[  1 1 0]}
    %     {[ 8]}    {[  0 1 0]}
    %     {[ 9]}    {[  1 1 1]}
    %     {[10]}    {[  1 0 1]}
    %     avglen = 3.3910
    
    %% Step 4
    codeLength = CalculateCodeLength(itemsP, dict);     
    % Result: Calculated entropy is 3.3216. Avarage length is 3.3910.
    % Difference is 0.0694 it's pretty close. If difference is 0 then length would be infinite.
    
    %% Step 5
    encodedProve = ReturnHuffmanenco(prove, dict); 
    % Result 33.910 Character
    
    %% Step 6
    huffmanenco(prove, dict);
    % Result 33.910 character

    %% Step 7
    ReturnHuffmandeco(encodedProve, dict);
    % Result 10.000 character
    
    %% Step 8
    huffmandeco(encodedProve, dict); 
    % Result 10.000 character
    
end
